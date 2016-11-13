# namesearch_api
Import the Database with:
```
mysql -u username -p database_name < all_names_db.sql
```

Run the server with:
```
php -S localhost:8000
```

Send the GET/POST requests to:
```
http://localhost:8000/search.php?fname=first_name
```
or
```
http://localhost:8000/search.php?lname=last_name
```
