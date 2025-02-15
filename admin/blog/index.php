<?php 

    error_reporting(E_WARNING|E_NOTICE);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

//    if(!isset($_POST['blog_button'])) {
//     header("location: ../../index.php");
//    }

    $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
    $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
    $blog_image = isset($_FILES['blog_image']) ? $_FILES['blog_image'] : "";



if ($blog_image) {
    // Read the image as Base64
    $imagePath = $blog_image["tmp_name"];
    $encodedImage = base64_encode(file_get_contents($imagePath));
}
?>

<script>
    console.log("hello world");
    
    var blogImage = {
        name: "<?php echo isset($blog_image['name']) ? $blog_image['name'] : ''; ?>",
        type: "<?php echo isset($blog_image['type']) ? $blog_image['type'] : ''; ?>",
        data: "<?php echo $encodedImage; ?>"
    };

    console.log("Blog Image:", blogImage);
</script>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon"
    href="https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/GNOME_Text_Editor_Icon.svg/1200px-GNOME_Text_Editor_Icon.svg.png">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- It is a Bootstrap CSS Link -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'
    integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <title>Rich Text Editor</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="../../assets/admin_images/logo.png">
    <link rel="stylesheet" href="../../assets/admin_css/style.css">
</head>

<body>
<header>
    <div class="container">
        <div class="header-content">
            <img src="../../assets/admin_images/logo.png" alt="Company Logo" class="logo">
            <h1>Finofield</h1>
            <h2>Blogs</h2>
        </div>
    </div>
</header>
    <div class="container">
        <div class="save">
            <input type="text" id="fileName" value="<?php echo $blog_title; ?>">
            <textarea name="" id="description" style="display: none;"><?php   echo $blog_description  ?></textarea>
            <input type="file" id="fileInput" style="display: none;">
            <button id="save" class="saveFile"><i class="fa fa-save"> SAVE</i></button>
        </div>
        <div class="options">
            <!-- Text Format -->
            <button id="bold" class="option-button format" data-toggle="tooltip" data-placement="top" title="bold">
                <i class="fa-solid fa-bold"></i>
            </button>
            <button id="italic" class="option-button format" data-toggle="tooltip" data-placement="top" title="italic">
                <i class="fa-solid fa-italic"></i>
            </button>
            <button id="underline" class="option-button format" data-toggle="tooltip" data-placement="top"
                title="underline">
                <i class="fa-solid fa-underline"></i>
            </button>
            <button id="strikethrough" class="option-button format" data-toggle="tooltip" data-placement="top"
                title="Strikethrough">
                <i class="fa-solid fa-strikethrough"></i>
            </button>
            <button id="superscript" class="option-button script" data-toggle="tooltip" data-placement="top"
                title="Superscript">
                <i class="fa-solid fa-superscript"></i>
            </button>
            <button id="subscript" class="option-button script" data-toggle="tooltip" data-placement="top"
                title="Subscript">
                <i class="fa-solid fa-subscript"></i>
            </button>

            <!-- List -->
            <button id="insertOrderedList" class="option-button" data-toggle="tooltip" data-placement="top"
                title="Order List">
                <div class="fa-solid fa-list-ol"></div>
            </button>
            <button id="insertUnorderedList" class="option-button" data-toggle="tooltip" data-placement="top"
                title="Unorder List">
                <i class="fa-solid fa-list"></i>
            </button>

            <!-- Undo/Redo -->
            <button id="undo" class="option-button" data-toggle="tooltip" data-placement="top" title="Undo">
                <i class="fa-solid fa-rotate-left"></i>
            </button>
            <button id="redo" class="option-button" data-toggle="tooltip" data-placement="top" title="Redo">
                <i class="fa-solid fa-rotate-right"></i>
            </button>

            <!-- Link -->
            <button id="createLink" class="adv-option-button" data-toggle="tooltip" data-placement="top"
                title="AddLink">
                <i class="fa fa-link"></i>
            </button>
            <button id="unlink" class="option-button" data-toggle="tooltip" data-placement="top" title="Remove Link">
                <i class="fa fa-unlink"></i>
            </button>

            <button id="embadeCode" class="option-button" data-toggle="tooltip" data-placement="top"
                title="Embade Code">
                <i class="fa fa-code"></i>
            </button>

            <!-- Alignment -->
            <button id="justifyLeft" class="option-button align" data-toggle="tooltip" data-placement="top"
                title="Alignment left">
                <i class="fa-solid fa-align-left"></i>
            </button>
            <button id="justifyCenter" class="option-button align" data-toggle="tooltip" data-placement="top"
                title="Alignment Center">
                <i class="fa-solid fa-align-center"></i>
            </button>
            <button id="justifyRight" class="option-button align" data-toggle="tooltip" data-placement="top"
                title="Alignment Right">
                <i class="fa-solid fa-align-right"></i>
            </button>
            <button id="justifyFull" class="option-button align" data-toggle="tooltip" data-placement="top"
                title="Justify Content">
                <i class="fa-solid fa-align-justify"></i>
            </button>
            <button id="indent" class="option-button spacing" data-toggle="tooltip" data-placement="top" title="Intend">
                <i class="fa-solid fa-indent"></i>
            </button>
            <button id="outdent" class="option-button spacing" data-toggle="tooltip" data-placement="top"
                title="Outtend">
                <i class="fa-solid fa-outdent"></i>
            </button>

            <!-- Headings -->
            <select id="formatBlock" class="adv-option-button" data-toggle="tooltip" data-placement="top"
                title="Heading">
                <option value="" selected>SELECT</option>
                <option value="H1">H1</option>
                <option value="H2">H2</option>
                <option value="H3">H3</option>
                <option value="H4">H4</option>
                <option value="H5">H5</option>
                <option value="H6">H6</option>
            </select>

            <!-- Font -->
            <select id="fontName" class="adv-option-button" data-toggle="tooltip" data-placement="top"
                title="Font Name"></select>
            <select id="fontSize" class="adv-option-button" data-toggle="tooltip" data-placement="top"
                title="Font Size"></select>

            <!-- Color -->
            <div class="input-wrapper" data-toggle="tooltip" data-placement="top" title="text color">
                <input type="color" id="foreColor" class="adv-option-button" />
                <label for="foreColor">Font Color</label>
            </div>
            <div class="input-wrapper" data-toggle="tooltip" data-placement="top" title="background color">
                <input type="color" id="backColor" class="adv-option-button" />
                <label for="backColor">Highlight Color</label>
            </div>
        </div>
        <div id="text-input" contenteditable="true"></div>
    </div>
    <!--Script-->
</body>

</html>

<script>
    let optionsButtons = document.querySelectorAll(".option-button");
    let advancedOptionButton = document.querySelectorAll(".adv-option-button");
    let fontName = document.getElementById("fontName");
    let fontSizeRef = document.getElementById("fontSize");
    let writingArea = document.getElementById("text-input");
    let linkButton = document.getElementById("createLink");
    // let imageButton = document.getElementById("createImage");
    let embadedCode = document.getElementById("embadeCode");
    let alignButtons = document.querySelectorAll(".align");
    let spacingButtons = document.querySelectorAll(".spacing");
    let formatButtons = document.querySelectorAll(".format");
    let scriptButtons = document.querySelectorAll(".script");
    let saveButton = document.getElementById("save");
    // let openButton = document.getElementById("open");

    //List of fontlist
    let fontList = [
        "Arial",
        "Verdana",
        "Times New Roman",
        "Garamond",
        "Georgia",
        "Courier New",
        "cursive",
        "Pacifico", // Cursive font
        "Dancing Script", // Cursive font
        "Great Vibes", // Cursive font
        "Lobster", // Cursive font
        "Bangers", // Cursive font
        "Comic Sans MS", // Cursive and bold
        "Brush Script MT", // Cursive and bold
        "Lucida Calligraphy", // Cursive and bold
        "Monotype Corsiva", // Cursive and bold
        "Pinyon Script", // Cursive font
        "Quicksand", // Bold
        "Exo", // Bold
        "Montserrat", // Bold
        "Raleway", // Bold
        "Open Sans", // Bold
    ];


    //Initial Settings
    const initializer = () => {
        //function calls for highlighting buttons
        //No highlights for link, unlink,lists, undo,redo since they are one time operations
        highlighter(alignButtons, true);
        highlighter(spacingButtons, true);
        highlighter(formatButtons, false);
        highlighter(scriptButtons, true);

        //create options for font names
        fontList.map((value) => {
            let option = document.createElement("option");
            option.value = value;
            option.innerHTML = value;
            fontName.appendChild(option);
        });

        //fontSize allows only till 7
        for (let i = 1; i <= 7; i++) {
            let option = document.createElement("option");
            option.value = i;
            option.innerHTML = i;
            fontSizeRef.appendChild(option);
        }

        //default size
        fontSizeRef.value = 3;
    };

    //main logic
    const modifyText = (command, defaultUi, value) => {
        //execCommand executes command on selected text
        document.execCommand(command, defaultUi, value);
    };

    //For basic operations which don't need value parameter
    optionsButtons.forEach((button) => {
        button.addEventListener("click", () => {
            modifyText(button.id, false, null);
        });
    });

    //options that require value parameter (e.g colors, fonts)
    advancedOptionButton.forEach((button) => {
        button.addEventListener("change", () => {
            modifyText(button.id, false, button.value);
        });
    });

    //link
    linkButton.addEventListener("click", () => {
        let userLink = prompt("Enter a URL");
        //if link has http then pass directly else add https
        if (/http/i.test(userLink)) {
            modifyText(linkButton.id, false, userLink);
        } else {
            userLink = "http://" + userLink;
            modifyText(linkButton.id, false, userLink);
        }
    });

    embadedCode.addEventListener('click', () => {
        let videoCode = prompt('Enter the YouTube video embed code:');
        if (videoCode !== null) {
            // You can further validate the videoCode to ensure it's a valid YouTube embed code.
            document.execCommand('insertHTML', false, videoCode);
        }
    });

    window.addEventListener('keydown', event => {
        if ((event.ctrlKey || event.metaKey) && (event.key === 'b' || event.key === 'B')) {
            event.preventDefault();
            document.querySelector('#bold').click();
        }
        if ((event.ctrlKey || event.metaKey) && (event.key === 'i' || event.key === 'I')) {
            event.preventDefault();
            document.querySelector('#italic').click();
        }
        if ((event.ctrlKey || event.metaKey) && (event.key === 'u' || event.key === 'U')) {
            event.preventDefault();
            document.querySelector('#underline').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.shiftKey && (event.key === 'l' || event.key === 'L')) {
            event.preventDefault();
            document.querySelector('#justifyLeft').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.shiftKey && (event.key === 'e' || event.key === 'E')) {
            event.preventDefault();
            document.querySelector('#justifyCenter').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.shiftKey && (event.key === 'r' || event.key === 'R')) {
            event.preventDefault();
            document.querySelector('#justifyRight').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.shiftKey && (event.key === 'f' || event.key === 'F')) {
            event.preventDefault();
            document.querySelector('#justifyFull').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.key === '+') {
            event.preventDefault();
            document.querySelector('#superscript').click();
        }
        if ((event.ctrlKey || event.metaKey) && event.key === '=') {
            event.preventDefault();
            document.querySelector('#subscript').click();
        }
        if ((event.ctrlKey || event.metaKey) && (event.key === 'o' || event.key === 'o')) {
            event.preventDefault();
            document.querySelector('#open').click();
        }
        if ((event.ctrlKey || event.metaKey) && (event.key === 's' || event.key === 'S')) {
            event.preventDefault();
            document.querySelector('#save').click();
        }
    });


    //Highlight clicked button
    const highlighter = (className, needsRemoval) => {
        className.forEach((button) => {
            button.addEventListener("click", () => {
                //needsRemoval = true means only one button should be highlight and other would be normal
                if (needsRemoval) {
                    let alreadyActive = false;

                    //If currently clicked button is already active
                    if (button.classList.contains("active")) {
                        alreadyActive = true;
                    }

                    //Remove highlight from other buttons
                    highlighterRemover(className);
                    if (!alreadyActive) {
                        //highlight clicked button
                        button.classList.add("active");
                    }
                } else {
                    //if other buttons can be highlighted
                    button.classList.toggle("active");
                }
            });
        });
    };

    const highlighterRemover = (className) => {
        className.forEach((button) => {
            button.classList.remove("active");
        });
    };



    // saveButton.addEventListener("click", () => {
    //     let contentToSave = `<div class="blog_details">${document.getElementById('text-input').innerHTML}</div>`;

    //     const fileName = document.getElementById('fileName').value + ".html";
    //     const topic = document.getElementById('fileName').value;
    //     const blog_title = '<?php //echo $blog_title; ?>';
    //     const blog_description = '<?php //echo $blog_description; ?>';
    //     const blog_image = '<?php //echo $blog_image; ?>';

    //     const xhr = new XMLHttpRequest();
    //     xhr.open('POST', 'save.php', true);
    //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //     xhr.onreadystatechange = function () {
    //         if (xhr.readyState === 4 && xhr.status === 200) {
    //             alert(xhr.responseText); // Show success/failure message
    //             location.replace("../../blog.php");
    //         }
    //     };

    //     xhr.send(`content=${encodeURIComponent(contentToSave)}&blog_title=${encodeURIComponent(blog_title)}&blog_description=${encodeURIComponent(blog_description)}&blog_image=${encodeURIComponent(blog_image)}&conditon=${encodeURIComponent('save')}`);
    // });


    saveButton.addEventListener("click", () => {
    let contentToSave = `<div class="blog_details">${document.getElementById('text-input').innerHTML}</div>`;

    if (!blogImage.data) {
        alert("No image found!");
        return;
    }

    // Convert Base64 to Blob
    function base64ToBlob(base64, mimeType) {
        let byteCharacters = atob(base64);
        let byteNumbers = new Array(byteCharacters.length);
        for (let i = 0; i < byteCharacters.length; i++) {
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        let byteArray = new Uint8Array(byteNumbers);
        return new Blob([byteArray], { type: mimeType });
    }

    let blob = base64ToBlob(blogImage.data, blogImage.type);
    let file = new File([blob], blogImage.name, { type: blogImage.type });

    console.log("Generated File:", file);

    // Create FormData
    const formData = new FormData();
    formData.append("content", contentToSave);
    formData.append("blog_title", document.getElementById('fileName').value);
    formData.append("blog_description", document.getElementById('description').value);
    formData.append("blog_image", file);
    formData.append("condition", "save");

    // Send AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Server Response:", xhr.responseText);
            alert(xhr.responseText);
            location.replace("../blogs.php");
        }
    };

    xhr.send(formData); // Send form data with file
});



        

    // // open a existing file to modify
    // openButton.addEventListener("click", () => {
    //     console.log("hi");
    //     const fileInput = document.getElementById('fileInput');
    //     fileInput.click();

    //     fileInput.addEventListener("change", () => {
    //         const file = fileInput.files[0];

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function (event) {
    //                 const fileContent = event.target.result;
    //                 const textInput = document.getElementById('text-input');
    //                 textInput.innerHTML = fileContent;
    //                 append = true;
    //             };
    //             reader.readAsText(file);
    //         }
    //     });

    // });

    document.getElementById("text-input").addEventListener("paste", async (event) => {
        let items = (event.clipboardData || event.originalEvent.clipboardData).items;
        for (let item of items) {
            if (item.type.indexOf("image") === 0) {
                event.preventDefault();
                let blob = item.getAsFile();
                let reader = new FileReader();
                reader.onload = function (event) {
                    let img = new Image();
                    img.src = event.target.result;
                    img.style.maxWidth = "300px"; // Reduce image size
                    img.style.height = "auto";
                    document.getElementById("text-input").appendChild(img);
                };
                reader.readAsDataURL(blob);
            }
        }
    });

    window.onload = initializer;
</script>