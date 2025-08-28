const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/messages.js", "public/js")
    .vue()
    .extract(["vue"])
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
