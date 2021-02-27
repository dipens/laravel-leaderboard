This project was made using Laravel, MySql, Docker and PHPUnit. To get started run the following commands.

```git clone https://github.com/dipens/laravel-leaderboard.git your-folder-name```

and then

```cd your-folder-name && ./vendor/bin/sail up```


More information:

The following api routes are available:

| URL        | Description           |
| ------------- |-------------|
| ```GET /leaders```      | returns the leaderboard sorting points in descending order |
| ```GET /leaders/{id}```      | returns leader details, requires leader id |
| ```POST /leaders```      | create a new leader |
| ```PUT /leaders/{id}```      | updates a leader, requires leader id |
| ```PUT /updatePoints/{actionType}/{id}```      | update points based on actionType. actionType = INCREASE OR DECREASE, requires leader id and actionType, returns updated leaderboard |
| ```DELETE /leaders/{id}```      | deletes the leader based on id, requires leader id |

Basic unit testing implemented.
