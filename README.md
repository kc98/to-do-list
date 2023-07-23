## Todo list

A simple todo list allows user to add or delete todo without authencation.

## Features

-   Different users on different browsers can make their own todo lists
-   User can delete individual todo items
-   Todo list clears after the browser tab is closed for 20 seconds or more (configurable)
-   Todo list clears after user is idle for 5 minutes (configurable)

## How to install & run

1. Clone the project

```bash
git clone https://github.com/kc98/to-do-list.git
```

2. Go to the project directory

```bash
cd to-do-list
```

3. Install backend dependencies

```bash
composer install
```

4. Run the development server

```bash
php artisan serve
```

5. The server is run (by default) on port 8000 - http://localhost:8000/

## Settings

You can configure session settings in `config/session.php`, the settings that is used for this project in particular is:

-   `lifetime` (int, in seconds): determines how long the session is valid for after browser close
-   `expire_on_close` (boolean): determines if session becomes invalid after browser close, duration is dictated by `lifetime`
-   `idle_time` (int, in seconds): determine how long the user can take no action before clearing the session
-   `inactivity_time` (int, in seconds): determines how long the browser tab can stay closed before clearing the session
-   `activity_pulse_time` (int, in seconds): determines the duration between each activity pulse that notifies the server that the tab is still currently open, must be lower than `inactivity_time`
