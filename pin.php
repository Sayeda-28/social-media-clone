<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="normalize.css?v=<?php echo time(); ?>">
   
    <link rel="stylesheet" href="pin.css?v=<?php echo time(); ?>">
</head>

<body>
    <input type="file" name="picture" id="picture">

    <div class="card">
        <div class="pin_title"></div>

        <div class="pin_modal">
            <div class="modal_head">
                <div class="save_card">Save</div>
            </div>

            <div class="modal_foot">
                <!---<div class="destination">
                    <div class="pint_mock_icon_container">
                        <img src=".upper-right-arrow.png" alt="destination" class="pint_mock_icon">
                    </div>
                    <span>Eatery</span>
                </div>-->

                <div class="pint_mock_icon_container">
                    <img src="send.png" alt="send" class="pint_mock_icon">
                </div>

                <div class="pint_mock_icon_container">
                    <img src="ellipse.png" alt="edit" class="pint_mock_icon">
                </div>
            </div>
        </div>

        <div class="pin_image">
            <img src="" alt="pin_image">
        </div>


    </div>

   
</body>

</html>
<script>
document.querySelector('#picture').addEventListener('change', event => {
    if (event.target.files && event.target.files[0]) {
        if (/image\/*/.test(event.target.files[0].type)) {
            const reader = new FileReader();

            reader.onload = function() {
                document.querySelector('.pin_image img').src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    }

    document.querySelector('#picture').value = '';
});

</script>