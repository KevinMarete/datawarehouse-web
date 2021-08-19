#!/bin/sh
kill $(lsof -t -i:8000) 2>/dev/null &
kill $(lsof -t -i:8001) 2>/dev/null