<?php
/**
 * Session management class
 * Provides centralized session handling with security features
 */

require_once '../config/config.php';

class Session {
    private static $instance = null;

    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct() {
        $this->startSession();
    }

    /**
     * Get singleton instance of Session
     * @return Session
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Start session with security settings
     */
    private function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            // Set session cookie parameters for security
            $cookieParams = session_get_cookie_params();
            session_set_cookie_params([
                'lifetime' => SESSION_TIMEOUT,
                'path' => '/',
                'domain' => $_SERVER['HTTP_HOST'],
                'secure' => isset($_SERVER['HTTPS']),
                'httponly' => true,
                'samesite' => 'Strict'
            ]);

            session_start();

            // Regenerate session ID periodically for security
            if (!isset($_SESSION['created'])) {
                $_SESSION['created'] = time();
            } elseif (time() - $_SESSION['created'] > SESSION_TIMEOUT) {
                session_regenerate_id(true);
                $_SESSION['created'] = time();
            }
        }
    }

    /**
     * Set session variable
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Get session variable
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check if session variable exists
     * @param string $key
     * @return bool
     */
    public function has($key) {
        return isset($_SESSION[$key]);
    }

    /**
     * Remove session variable
     * @param string $key
     */
    public function remove($key) {
        unset($_SESSION[$key]);
    }

    /**
     * Destroy session
     */
    public function destroy() {
        session_unset();
        session_destroy();
        session_regenerate_id(true);
    }

    /**
     * Check if user is logged in
     * @return bool
     */
    public function isLoggedIn() {
        return $this->get('logged_in', false);
    }

    /**
     * Set user login status
     * @param bool $status
     * @param array $userData
     */
    public function setLoginStatus($status, $userData = []) {
        if ($status) {
            $this->set('logged_in', true);
            $this->set('user_id', $userData['id'] ?? null);
            $this->set('name', $userData['name'] ?? null);
        } else {
            $this->set('logged_in', false);
            $this->remove('user_id');
            $this->remove('name');
        }
    }

    /**
     * Get user ID
     * @return int|null
     */
    public function getUserId() {
        return $this->get('user_id');
    }

    /**
     * Get user name
     * @return string|null
     */
    public function getUserName() {
        return $this->get('name');
    }

    /**
     * Set flash message
     * @param string $message
     * @param string $type
     */
    public function setFlashMessage($message, $type = 'success') {
        $this->set('flash_message', [
            'message' => $message,
            'type' => $type
        ]);
    }

    /**
     * Get and clear flash message
     * @return array|null
     */
    public function getFlashMessage() {
        $message = $this->get('flash_message');
        if ($message) {
            $this->remove('flash_message');
        }
        return $message;
    }
}
?>
