<h2>FormPopulate</h2>
With the help of FormPopulate you can create form in less than a minute. <br>
FormPopulate will:
<ul>
    <li>Autopopulate Form from database</li>
    <li>Auto Populate select option</li>
    <li>Add class and attribute to form element</li>
</ul>
<h2>Documentation</h2>
FormPopulate make use of getColumnListing(string $table) for listing column of a given table. 
<h3>Installation</h3>
<ul>
    <li>Clone it from https://github.com/Dapborlang/FormPopulate.git and use composer update to finish the installation. </li>
    <li>Run php artisan migrate and serve the application for testing</li>
    <li>Default User: admin@domain.com and Password: password</li>
</ul>    
<h3>Creating Forms</h3>
<ul>
    <li>First you need create Model and migration.</li>
    <li>Goto Form and then Create.</li>
    <li>Fill the required fields as shown belown</li>
</ul>
<img src="readme/FormPopulate1.jpg" alt="masterform">
<ul>
    <li>In this case, fill Header="Bank", Table Name="banks", Model="Bank", Route="formbuilder" and Role="Admin" (You can add many user's Role) and Submit</li>
</ul>
You will be redirect to another form for filling more details as shown below.
<img src="readme/FormPopulate2.jpg" alt="formdetails">
<ul>
    <li>In this case, select Form Populate Id="Bank", Exclude="id,updated_at,created_at", Attributes="{"bank":"required","code":"required"}". Leave blank all other fields and press Submit</li>
    <li>Remember to specify the guarded attribute on the model</li>
</ul>
<h4>Hurray! The CRUD operation for Bank is ready</h4>
https://youtu.be/uK1WyB6rO1o
