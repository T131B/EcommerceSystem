 # E-commerce System For CPanal
 product M > 1 category
 product M > N customer > make table Order  

 # 1- Database Done
 - Entities :
            - customers > id , name , password , phone
            - Admins > id , name , password
            - products > id , name , desc , categoryID
            - orders  > id , customerID , productID 
            - category > id , name
            - feedback > id , text , customerID
=======================================
- Relations :
            - product Has one category
            - orders has one customer , and one product
            - fedback has one customer
========================================
# 2-design



