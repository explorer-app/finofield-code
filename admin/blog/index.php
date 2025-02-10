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
            <input type="text" id="fileName" value="index.html" placeholder="Enter a File Name">
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