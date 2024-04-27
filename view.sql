CREATE OR REPLACE VIEW itemsView AS SELECT items.* ,categories.* FROM items INNER JOIN categories
 ON categories.categories_id 
 =items.items_categories

 

 

CREATE OR REPLACE VIEW myFavorite AS
SELECT favorite.* ,items.*, users.users_id FROM favorite 
INNER JOIN users ON users.users_id =favorite.favorite_userId
INNER JOIN items ON items_id =favorite.favorite_itemsId




-- CREATE OR REPLACE VIEW cartView AS
-- SELECT items.*,cart.*,SUM(items.items_price)As
-- itemsPriceAll,SUM(( items_price - ( items_price * items_discount / 100 ))) AS itemsPriceAllWithDiscount,COUNT(cart.cart_itemsId) AS itemsCountAll FROM items INNER JOIN 
-- cart ON cart.cart_itemsId =items.items_id GROUP BY cart.cart_userId,cart.cart_itemsId,cart.cart_orderId


CREATE OR REPLACE VIEW cartView AS
SELECT items.*,cart.*,SUM(items.items_price)As
itemsPriceAll,SUM(( items_price - ( items_price * items_discount / 100 ))) AS itemsPriceAllWithDiscount,COUNT(cart.cart_itemsId) AS itemsCountAll FROM items INNER JOIN 
cart ON cart.cart_itemsId =items.items_id WHERE cart_orderId=0 GROUP BY cart.cart_userId,cart.cart_itemsId ,cart.cart_orderId

CREATE OR REPLACE VIEW orderView AS SELECT orders.*,address.* FROM orders 
LEFT JOIN address ON address.address_id=orders.orders_addressId 


CREATE OR REPLACE VIEW orderDetailsView AS
SELECT items.*,cart.*,SUM(items.items_price)As
itemsPriceAll,SUM(( items_price - ( items_price * items_discount / 100 ))) AS itemsPriceAllWithDiscount,COUNT(cart.cart_itemsId) AS itemsCountAll FROM items INNER JOIN 
cart ON cart.cart_itemsId =items.items_id 
WHERE cart_orderId!=0
GROUP BY cart.cart_userId,cart.cart_itemsId ,cart.cart_orderId







