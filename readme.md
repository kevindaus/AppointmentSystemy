
admin@appointmentsystem.com
password

@TODO -
credit application allow to choose between , 
existing customer 
or
new customer
step 1
@DONE
 

@TODO 
finish
Credit application flow
@DONE

@TODO 
= allow admin to see and approve a credit application
- after approved , 
@DONE

@TODO - 
- allow admin to see list of approved credit application
@DONE

@TODO - sales
@DONE

@TODO - 
payment
payment history

@TODO - 
show list of overdue payment
    - overdue amount , customer name , customer contact number , a button that will send notification 
     

@TODO - bug
when uploading file name same with existing file name 
it will overrite the existing file 

@TODO - 
system auto notification setting , 
    - 

@TODO -
As Admin
    Staff record
        create
        update
        delete
        view
        view all
    View All Credit Application
    View Credit Application
        - view co maker
        - view customer detail
            - view children
        - view collateral
        - view staff who handled the credit application
        - view house address map
    Product Record
        create
        update
        delete
        view
        view all
        

@TODO - Wizard type application process

Step 1
application-form/customer/new
if new customer
else 
application-form/customer/new-application 

step 2 

credit-application/customer/{customer_id}/collateral

step 3

credit-application/{credit-application-id}/choose-model/

step 4

credit-application/{credit-application-id}/computation-breakdown/

Step 5

credit-application/{credit-application-id}/co-maker

Step 6 
credit-application/{credit-application-id}/customer-map-address/

@TODO
Update many to many 
to belongs to

@TODO 
delete pivot table model
--we dont need it

@TODO
/customer/all
/customer/{customer_id}
    - show customer credit applications
    - show payment history
    - show previous purchases

/credit-application/all
/credit-application/pending
/credit-application/rejected
/credit-application/view/{credit-application-id}
    - show customer information , 

@TODO - make pibot table uniq column


@TODO - admin can view backend  , nothing else 

@TODO - customer can view his/information and his/her payment history
