<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<script src="https://kit.fontawesome.com/ff8aa00b8d.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	
    <link rel="stylesheet" href="normalize.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css?v=<?php echo time(); ?>">
<style>
.topnav {
    margin-top: 20px;
    overflow: hidden;
  box-sizing: border-box;
}

    .topnav a {
        float: right;
        display: block;
        color: #B85C38;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        margin-right: 15px;
        font-weight: bolder;
    }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
            border-radius:100px;
        }

        .topnav a.active {
            background-color:#000000;
            color: White;
            border-radius:50px;
        }

    .topnav .search-container {
        float: left;
        margin-left:20px;
    }

    .topnav input[type=text]::-webkit-input-placeholder {
        font-family: FontAwesome;
        font-weight: normal;
        overflow: visible;
        vertical-align: top;
        display: inline-block !important;
        padding-left: 5px;
        padding-top: 2px;
        color: #4d4949;
        
    }

    .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 25px;
        background-color: #d7d5d5;
        border:none;
        border-radius:50px;
        width: 1000px;
    }
</style>
</head>

<body>
<div class="topnav">

  <a class="active"  style="float:left; margin-left:10px" href="homepage.php">Home</a>


  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="&#xF002;"name="search">
      
    </form>
  </div>
   <a><i class="fas fa-bell" style="font-size:25px"></i></a>
  <a><i class="fas fa-user-alt" style="font-size:25px"></i></a>
</div>
    <div class="add_pin_modal">
        <div class="add_pin_container">
            <div class="side" id="left_side">
                 <div class="section3">
                    <button class="save_from_site">Back</button>
                </div>

                <div class="section2">
                    <label for="upload_img" id="upload_img_label">
                        <div class="upload_img_container">
                            <div id="dotted_border">
                                <div class="pint_mock_icon_container">
                                    <img src="up-arrow.png" alt="upload_img" class="pint_mock_icon">
                                </div>
                                <div>Click to upload</div>
                                <div>Recommendation: Use high-quality .jpg files less than 20MB</div>
                            </div>
                        </div>
                        <input type="file" name="upload_img" id="upload_img">
                    </label>

                    <div class="modals_pin">
                        <div class="pin_image">
                            <!-- <img src="" alt="pin_image"> -->
                        </div>
                    </div>
                </div>

               
            </div>

            <div class="side" id="right_side">
                <div class="section1">
                    <div class="select_size">
                        <select name="pin_size" id="pin_size">
                            <option value="" disabled selected>Uplaod</option>
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                        </select>
                        <div class="save_pin">Upload</div>
                    </div>
                </div>

                <div class="section2">
                    <input placeholder="Add your title" type="text" class="new_pin_input" id="pin_title">
                    <input placeholder="Tell everyone what your Pin is about" type="text" class="new_pin_input" id="pin_description">
                    <input placeholder="Add a destination link" type="text" class="new_pin_input" id="pin_destination">
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
<script>
let pin_image_blob = null;


document.querySelector('#upload_img').addEventListener('change', event => {
    if (event.target.files && event.target.files[0]) {
        if (/image\/*/.test(event.target.files[0].type)) {
            const reader = new FileReader();

            reader.onload = function () {
                const new_image = new Image();

                new_image.src = reader.result;
                pin_image_blob = reader.result;

                new_image.onload = function () {
                    const modals_pin = document.querySelector('.add_pin_modal .modals_pin');

                    new_image.classList.add('pin_max_width');

                    document.querySelector('.add_pin_modal .pin_image').appendChild(new_image);
                    document.querySelector('#upload_img_label').style.display = 'none';

                    modals_pin.style.display = 'block';

                    if (
                        new_image.getBoundingClientRect().width < new_image.parentElement.getBoundingClientRect().width ||
                        new_image.getBoundingClientRect().height < new_image.parentElement.getBoundingClientRect().height
                    ) {
                        new_image.classList.remove('pin_max_width');
                        new_image.classList.add('pin_max_height');
                    }

                    modals_pin.style.opacity = 1;
                }
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    }

    document.querySelector('#upload_img').value = '';
});

document.querySelector('.save_pin').addEventListener('click', () => {
    const users_data = {
        author: 'Jack',
        board: 'default',
        title: document.querySelector('#pin_title').value,
        description: document.querySelector('#pin_description').value,
        destination: document.querySelector('#pin_destination').value,
        img_blob: pin_image_blob,
        pin_size: document.querySelector('#pin_size').value
    }

    console.log(users_data);
});

</script>