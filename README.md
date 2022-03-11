# What's Stock suppose to be

Stock aims to be a base pre-develop ERP system. Tries to be a good well based, dynamic, and scalable starting point where all needed features can be easily added (by a Laravel/Vuejs developer).
All ERP systems tend to be super loaded, multi-feature, with everything everyone could need, and that might make them very hard to understand or where is difficult to find just those features that a very small company might need. May be is just a small clothing store that needs an easy and ready inventory track with an option to make sales for reducing the inventory and summing up the money made on the day, that will be covered. But later on, the company grows and Stock will be there ready and open to growing with it.

## Installation

For now, there is just a development environment.

If you have docker and docker-compose already installed on your system.
Simply clone this repo and run "./setup.sh" on the console from the Stock roots folder. That file will display step by step what is it doing.
After running the setup.sh, Stock should be accessible by pointing the browser to localhost.
After rebooting the Nginx and containers will be shut down and next time you need to lift the system to keep working on it just run "docker-composer up -d" on the Stock roots folder.

TODO: Production deploys feature.

```bash
./setup.sh
```

## After rebooting

```bash
docker-compose up -d
```
