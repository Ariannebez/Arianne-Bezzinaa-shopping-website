# CraftedWithLoveStore

## Overview

This shopping website offers a comprehensive online shopping experience, featuring a wide range of products, user account management, order processing, wishlist, and administrative functionalities. 
The website includes a main shopping area, user account pages, and an admin panel for site management.

## Requirements

MAMP: The project uses MAMP as a local server and database environment. I installed it from the official website.

# Main Website
## The main website is structured as follows:

## PHP Files:
-	index.php: The homepage displaying featured products and categories.
-	shop.php: Page where users can browse and select products.
-	product-page.php: Displays detailed information for each product.
-	wishlist.php: Allows users to manage their wishlist they can remove item from wishlist or add to cart.
-	myaccount.php: User account management page here user logs in or creates a sing up.
-	userdetails.php: Shows detailed information about the user, here user can update their data.
-	signout.php: Handles the user sign-out process.
-	profile.php: User profile management here users view their details and can edit them with a button edit details which takes them to userdetails.php page.
-	aboutUs.php: Information about the website.
-	contactUs.php: Contact page for customer queries and support.
-	orderlist.php: Lists user's orders.
-	orderdetails.php: Detailed view of a specific order.
-	orderConfirmed.php: Confirmation page for completed orders.

## Additional Directories

-	css/: Contains the CSS files for styling the website.
-	includes/: Header ,Navbar,  footer and functions, dbfunctions and dbh(to connect my database to my code)
-	img/: : Images for product categories and individual items.
-	documents/: Documentation and resources related to task 1 and 3.

# The Admin panel includes:
## Admin PHP Files
-	admin-login.php: Admin authentication.
-	user-management.php: User account administration here admin user can delete user or procced to editing details page.
-	product-management.php: Product catalog management, here admin user can see what products are in the shop or add new products.
-	product-details-management.php: This page is displayed when user admin clicks edit button from product-management.php page, here is detailed product information where user admin can Updata the data.
-	category-management.php: Category management.
-	order-management.php: Order processing and tracking, here admin user can cancel an order .
-	admin-edit-user.php: Editing and managing user profiles.

# Admin Directories
-	css/: Custom CSS for the admin interface.
-	includes/: Header ,Navbar,  footer and functions, dbfunctions and dbh(to connect my database to my code)
-	img/: Images used in the admin interface.
