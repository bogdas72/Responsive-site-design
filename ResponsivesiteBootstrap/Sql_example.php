<?php
    include_once 'header.php';
?>

    <main>
        <div class="container-lg mt-2">
            <h2 class="text-center mt-3">SQL Example</h2>
            <p>The form below will display the customers from the country you select.</p>
            <form action="">
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="selcountry">Select list (select one):</label>
                        <select class="form-control" id="selcountry">
                            <option value="Argentina">Argentina</option>
                            <option value="Austria">Austria</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Italy">Italy</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Norway">Norway</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Spain">Spain</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="UK">UK</option>
                            <option value="USA">USA</option>
                            <option value="Venezuela">Venezuela</option>
                        </select>
                    </div>
                </div>    
                <button type="button" class="btn btn-dark" onclick="showCustomer()">Select</button>
            </form> <br>    
        </div>
        <div class="container-lg mt-2" id="responseTable"></div> 
    </main>

    <script src="showcustomer.js"></script>

<?php
    include_once 'footer.php';
?>