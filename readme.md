# Timezone Package
## Version: 1.0.0

This is a simple timezone package for use with php and mysql timezone tables. 
It allows you to get the current timezone, get the time in any timezone now,
and generate a list of all possible timezones and their current time. 

This can be used for any applications where users are choosing 

## Installation:

```bash
composer require henshall\timezones
```

## Usage:

Get array of all Timezones and their current times
```bash
$timezone = new Timezone("localhost", "username", "password", "database_name", "local_timezone(optional)");
$timezone->get_timezones_and_current_time()
```

Get local current time in a specific timezone
```bash
$timezone = new Timezone("localhost", "username", "password", "database", "local_timezone(optional)");
$japan_time = $timezone->get_time_now("Japan");
```

Get List of All Timezones and their current times
```bash
$timezone = new Timezone("localhost", "username", "password", "database", "local_timezone(optional)");
$timezones_array = $timezone->get_timezones_and_current_times();
```


Set Local Time to specific time ("note: this local_timezone variable is used to get the time in other timezones. if it is not set correctly, it will return invalid times. Always set it to the timezone of ther server, or simply let it be configured automatically by not setting it at all")
```bash
$timezone = new Timezone("localhost", "username", "password", "database", "local_timezone(optional)");
$timezone->$local_timezone = "Europe/Moscow";
```


# TO DO:

1) Timezones can change, we need to look into the $timezones_array variable to make sure that
its correct, and that it doesnt change with future versions of mysql. To do this we could generate
a config file for the $timezones_array variable, and we could build it using sql queries. This way 
a user would be able to simple run a command to generate the list - and we would never have to update it again.


