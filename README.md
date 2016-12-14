# CinemaSupply

Unless someone has an idea for hosting the database, my plan is to set up an AWS account tomorrow using a free trial. The assignment .pdf says we need to provide a link to a published page (instead of just running it locally and submitting source code).

The 'rentaldb.sql' is a SQL dump for a database containing two tables: 

1) 'movies' contains our movie information. There are over a dozen columns (e.g., genre, year, price, plot) that we can use to query the data or filter/sort the results. There are currently a few hundred records.

2) 'members' is empty but could be used for log-ins or account creations. Although I don't know how much additional functionality we will have time to include.
  
The admin-insert page was developed to save time while populating the database and was not intended to be in the finished product. In short, it's ugly spaghetti code that crudely parses a block of data from the OMDb API (http://www.omdbapi.com/) and uses magic numbers to pick the data fields we want before inserting them, as one complete record, into the database.

I am almost finished with a more user-friendly insert page which we can use in the finished product. I will add future files to, and work from, this repository.

The current search page was developed so I had something to show the group. I ended up starting the code from scratch and most of the time thus far has been spent designing/populating the database and developing the admin-insert page. It seems like  we don't have much right now but most of our project's content is *there,* we just have to decide on how/what we want to display and query the database accordingly.

I will finish the README tomorrow. Let me know if you have any questions.
