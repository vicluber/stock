#!/bin/bash
source .env

echo "Initialize? (y/n)"
read initializeWebsite

dockerContainer=stock-workspace
dockerDatabaseContainer=stock-db

initializeWebsite() {
			echo "- Running docker-compose"
			docker-compose up -d
			echo "- Running npm's watch script."
			echo "- This script will keep an eye on the js and css files for rebuilding the bundle whenever there is a change."
			docker exec $dockerContainer npm run watch
}

if [ "$initializeWebsite" == "y" ] 
	then
       initializeWebsite 
fi