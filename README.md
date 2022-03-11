# What's Stock supose to be

Stock aims to be a base pre-develop ERP system. Tries to be a good well based, dynamic, and scalable starting point where all needed features can be easly added (by a Laravel/Vuejs developer).
All ERP systems tends to be super loaded, multy feature, with everything everyone could need, and that might make them very hard to understand or where is dificult to find just those feature that a very small company might need. May be is just a small clothing store that needs easy and ready inventory track with an option to make sells for reducing the inventory and summing up the money made on the day, that will be covered. But later on the company grows and Stock will be there ready and open to grow with it.

## Installation

For now there is just a development enviroment.

If you have docker and docker-compose already installed on your system.
Simply clone this repo and run "./setup.sh" on the console from Stock roots folder. That file will display step by step what is it doing.
After running the setup.sh Stock should be accesible by pointing the browser to localhost.
After rebooting the nginx and containers will be shutted down and next you need to lift the system to keep working on it just run "docker-composer up -d" on Stock roots folder.

TODO: Production deploy feature.

```bash
./setup.sh
```

## After rebooting

```bash
docker-compose up -d
```
