NON SPECIFIC CHANGES



-Add the adminController function associated with kratmeister/book to their resprective controllers

- Include in named routes the used controller and function

- change the sessionBooksb variable to sessionBooks

- next version change sessionKratmeistertest name to sessionKratmeister

-A few times data is save with a delimiter such as &, for example book data in session storage. This should be changed because throught this the owner isnt able to use the symbol in the book title.

- also pre decode json array in the model instead of continously doing it in the controller


SPECIFIC CHANGES


-kratmeister/show.blade.php

-When a user forgets to enter a field. The old values for label and beerbrand selection are not repopulated. This is because allot of javascript is doing stuff with these values. Therefore to fix this alot of this needs to be rewritten. For now the user is prompted to
re enter their selections for the selection dropdowns. The easiest fix would be to pass the 
old() data also to the javascripts and reorder the values in de dropdown if needed.

-book/edit.blade.php
    -Make it is that everytime a product is changed the owner doesnt have to upload all the images

    -Show all the images uploaded images and make each one of them deletable


- OrderController.php
    Create  an edit and page so that the owner can change the discount on a page. Dont hard code it.


-ShoppingCartController.php

    -The kratmeister product in the the kratmeister session dont contain an ID, therefore if you want to delete a kratmeister for the session. For now
    this is done by using thte user_name as an identifier. This should be changed by giving each kratmeister in the session its own id.



-fileinputnameupdaters.js


    //there is an error in updateCarouselimageinputname when images with the same name are uploaded


