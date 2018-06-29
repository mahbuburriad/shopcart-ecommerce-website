<div class="profilename">
    <center>
        <h1>
            <?php echo $customer_name; ?>'s Profiles</h1>
    </center>

</div>

<hr>
<div class="table-responsive">

    <div class="usersection">



        <div class="col-sm-8">

            <table>
                <tr>
                    <th><i class="fas fa-user-circle"></i> Name</th>
                    <td>
                        <?php echo $customer_name; ?>
                    </td>
                </tr>

                <tr>
                    <th><i class="far fa-envelope-open"></i> E-mail</th>
                    <td>
                        <a href="mailto:<?php echo $customer_email; ?>">
                            <?php echo $customer_email; ?>
                        </a>

                    </td>
                </tr>

                <tr>
                    <th><i class="fas fa-globe"></i> Country</th>
                    <td>
                        <?php echo $customer_country; ?>
                    </td>
                </tr>

                <tr>
                    <th><i class="fas fa-university"></i> City</th>
                    <td>
                        <?php echo $customer_city; ?>
                    </td>
                </tr>

                <tr>
                    <th><i class="fas fa-phone"></i> Cell No</th>
                    <td>
                        <a href="tel:<?php echo $customer_contact; ?>">
                            <?php echo $customer_contact; ?>
                        </a>

                    </td>
                </tr>

                <tr>
                    <th><i class="fas fa-map-marker-alt"></i> Address</th>
                    <td>
                        <?php echo $customer_address; ?>
                    </td>
                </tr>


            </table>

        </div>

        <div class="col-sm-4">
            <img src='customer_images/<?php echo $customer_image;?>' class='img-responsive'>

        </div>



    </div>
</div>
