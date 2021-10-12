CONTROLLERS

BookItemController
-route(/books)

-index: gets all the books from Product model and returns the books.blade.php view
-shows: the books of interest view

KratMeisterItemController

-route(/kratmeister)

-index: gets all the kratmeister products from KratMeisterProduct model and returns the kratmeister.blade.php view
-show: kratmeister of interest view
-

OtherItemController
-index gets all the products that do not belong to books and return other.blade.php view
-show: other item of interest view






OrderController
BeerController

MODELS

OtherProducts
- consist out of other products

Book
-consists of books
- title, description, images etc

KratMeister
- only the kratmeister products thus the sticker
- thema, packaging size, price etc etc

Beer
- only beer brands
- beer brand, sixpack, full krate price etc etc.

Order
- list of all the orders

User
- table consisting of users update the create field



views

books, Other,KratMeister, orders, products, users, orderPage

models
User,Beer,Order,Book,Other,KratMeister

routes

/Books 
/Other 
/KratMeister 
/admin/orders
/admin/books
/admin/Beer
/admin/KratMeister
/admin/Other 
/admin/users

BookController ->index,show,create,delete,update
OtherController ->index,show,create,delete,update
KratMeisterController ->index,show,create,delete,update
OrderController ->index,show,create,delete,update
UserController ->



-------

BookController



admin/books/index crud spul
admin/kratmeist/index  crud spul


admin page knoppen naar 

books, kratmeister, overige producten, orders, user ino


overige producten maken dan meer paginga maken 


taken vandaag

book index maken



taken kratmeister verder afmaken

show page fixen



///////////////////////////////

orders spul fixen

lijst van productIDs



cookies stuff is kut 


als cookieslist niet exist
    -create cookies list
    -add idenfitier to list
    -create new cookie with identifier

als cookieslist wel exist
    -check als er al een cookie in de list zit die al de book_id heeft
    -indien ja add de request- bookcount_ to the bookcount
    - save book



-shoppingcart index = totale prijs even fixen
- order form in mekaar knallen nieuwe controller voor maken

