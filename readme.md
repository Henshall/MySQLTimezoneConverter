# Timezone Package for Mysql
## Version: 1.0.0

This is a simple timezone package for use with php and mysql timezone tables. 
It allows you to get the current timezone, get the time in any timezone now,
and generate a list of all possible timezones and their current time. This is great 
for creating applications which are required to know what timezone the user is in such as scheduling applications.

## Installation:
1) Install timezone tables for mysql
2) run composer require henshall\timezones

## Usage:

Use this to get and get your local timezone. Read the notes below on setting timezones.
```bash
$timezone = new Timezone("localhost", "username", "password", "database_name", "local_timezone(optional)");
$timezone->set_local_timezone("Europe/Moscow");
$local_timezone = $timezone->get_local_timezone();
```

Get array of all Timezones and their current times
```bash
$timezone = new Timezone("localhost", "username", "password", "database_name", "local_timezone(optional)");
$timezone->get_timezones_and_current_times()
```

Get local current time in a specific timezone
```bash
$timezone = new Timezone("localhost", "username", "password", "database_name", "local_timezone(optional)");
$japan_time = $timezone->get_time_now("Japan");
```

## NOTES:
- Your computers clock must be set correctly. If your clock it not set correctly, the timezone calculations will be wrong.
- The local timezone (find with get_local_timezone()) must be your current timezone. If the timezone is wrong, the calculations will also be wrong.
- This application will automatically determine your current timezone using the mysql tables, if it does this improperly, you may need to set it manually as shown in the examples above.

