# Timezone Package for Mysql
## Version: 1.0.0

This is a simple timezone package for use with php and mysql timezone tables. 
It allows you to get the current timezone, get the time in any timezone now,
and generate a list of all possible timezones and their current time. This is great 
for creating applications which are required to know what timezone the user is in
- such as scheduling applications.

## Installation:
1) Install timezone tables for mysql
2)
```bash
composer require henshall\timezones
```

## Usage:

Get array of all Timezones and their current times
```bash
$timezone = new Timezone("localhost", "username", "password", "database_name", "local_timezone(optional)");
$timezone->get_timezones_and_current_times()
```

Get local current time in a specific timezone
```bash
$timezone = new Timezone("localhost", "username", "password", "database", "local_timezone(optional)");
$japan_time = $timezone->get_time_now("Japan");
```

Set Local Time to specific time ("note: this local_timezone variable is used to get the time in other timezones. if it is not set correctly, it will return invalid times. Always set it to the timezone of ther server, or simply let it be configured automatically by not setting it at all")
```bash
$timezone = new Timezone("localhost", "username", "password", "database", "local_timezone(optional)");
$timezone->$local_timezone = "Europe/Moscow";
```
