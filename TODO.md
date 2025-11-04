# Fix Duplicate session_start() Calls

## Tasks
- [x] Remove duplicate session_start() in index.php (keep the one at the top)
- [x] Remove one duplicate session_start() in terms.php at the top
- [x] Consolidate session_start() calls in forgotpswd.php to have only one at the beginning
- [x] Test affected pages for session functionality
- [x] Verify no other files have duplicate session_start() calls
