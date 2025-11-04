<?php
/**
 * Security utility class
 * Provides CSRF protection, input validation, and sanitization
 */

require_once 'Session.php';

class Security {
    /**
     * Generate CSRF token
     * @return string
     */
    public static function generateCSRFToken() {
        $session = Session::getInstance();
        if (!$session->has('csrf_token')) {
            $token = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
            $session->set('csrf_token', $token);
        }
        return $session->get('csrf_token');
    }

    /**
     * Validate CSRF token
     * @param string $token
     * @return bool
     */
    public static function validateCSRFToken($token) {
        $session = Session::getInstance();
        $storedToken = $session->get('csrf_token');
        return hash_equals($storedToken, $token);
    }

    /**
     * Sanitize string input
     * @param string $input
     * @return string
     */
    public static function sanitizeString($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Sanitize email input
     * @param string $email
     * @return string
     */
    public static function sanitizeEmail($email) {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Validate email
     * @param string $email
     * @return bool
     */
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate password strength
     * @param string $password
     * @return bool
     */
    public static function validatePassword($password) {
        return strlen($password) >= PASSWORD_MIN_LENGTH;
    }

    /**
     * Hash password
     * @param string $password
     * @return string
     */
    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verify password
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Generate secure random string
     * @param int $length
     * @return string
     */
    public static function generateRandomString($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * Check if request is POST
     * @return bool
     */
    public static function isPostRequest() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Get sanitized POST data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getPostData($key, $default = null) {
        return isset($_POST[$key]) ? self::sanitizeString($_POST[$key]) : $default;
    }

    /**
     * Get sanitized GET data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getGetData($key, $default = null) {
        return isset($_GET[$key]) ? self::sanitizeString($_GET[$key]) : $default;
    }

    /**
     * Rate limiting for login attempts
     * @param string $identifier
     * @param int $maxAttempts
     * @param int $timeWindow
     * @return bool
     */
    public static function checkRateLimit($identifier, $maxAttempts = 5, $timeWindow = 900) {
        $session = Session::getInstance();
        $key = 'rate_limit_' . $identifier;

        $attempts = $session->get($key, []);

        // Remove old attempts outside the time window
        $attempts = array_filter($attempts, function($timestamp) use ($timeWindow) {
            return (time() - $timestamp) < $timeWindow;
        });

        if (count($attempts) >= $maxAttempts) {
            return false; // Rate limit exceeded
        }

        // Add current attempt
        $attempts[] = time();
        $session->set($key, $attempts);

        return true;
    }

    /**
     * Reset rate limit for identifier
     * @param string $identifier
     */
    public static function resetRateLimit($identifier) {
        $session = Session::getInstance();
        $session->remove('rate_limit_' . $identifier);
    }
}
?>
