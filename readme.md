Laravel Microservice API

Follow bellow step

1] install this package in local server and configure database in .env file (find database file petstore.sql)

2] Now, run php -S localhost:8000 -t public to serve the project. Head over to your browser. and run http://localhost:8000/

3] We have five methods here.

	- showAllPets -/GET
	
	- ShowOnePet - / POST
	
	- create - /POST
	
	- update - /PUT
	
	- delete - /DELETE
	
	
	For example, if you make a POST request to /api/pets API endpoint, the create function will be invoked.
	
	**Response Code**
	
	- 200 is an HTTP status code that indicates the request was successful.
    - 201 is an HTTP status code that indicates a new resource has just been created.
    - findOrFail method throws a ModelNotFoundException if no result is not found.
4] Finally, test the API routes with Postman.

	** To get all pets (Pet GET Operation)**
	http://localhost:8000/api/pets/
	
	* To create new pet (pet POST Operation)**
	http://localhost:8000/api/pets/
	
	Parameter :
		name:Tonny
		category:Brown
		tag:Brisbane
		photourl:xyz.png
		status:available 
		
	** To Delete pet (pet DELETE operation)**
	http://localhost:8000/api/pets/1
	
	** Find pet by ID (pet GET operation) **
	http://localhost:8000/api/pets/2
	
	** To update existing pet (pet PUT operation)
	http://localhost:8000/api/pets
		id:2
		name:tommy
		photourl:xyz.png
		status:pending
		
5] For validation

I have only applied validation on Pet name to create new pet. 
For more validation add name of the field in create method of PetController.
	