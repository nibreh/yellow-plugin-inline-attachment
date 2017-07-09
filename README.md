# Inline Attachment 0.7.1

Drag and Drop Image Upload. Plugin for Yellow CMS to easily embed images in a textarea. 

This plugin use [Inline Attachment by Rovak](http://git.razko.nl/InlineAttachment/)

## How do I install this?

1. [Download and install Yellow](https://github.com/datenstrom/yellow/).
2. Download [master.zip](https://github.com/nibreh/yellow-plugin-inline-attachment/archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `master.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to use this plugin?

Choose a location with the cursor, then drag and drop your image into textarea.

Images will be uploaded in your `/media/images/` folder with a random filename.

Inline Attachment get automatically your URL (http/https) and the right folder `media/images` if Yellow is in a subfolder.

By default, Inline Attachment comes with **Jquery 3.2.1** (https://code.jquery.com/jquery-3.2.1.min.js). You can change your version in `config.ini`.

