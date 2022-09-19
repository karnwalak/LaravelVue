let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .vue({
        options: {
            compilerOptions: {
                isCustomElement: (tag) => ["md-linedivider"].includes(tag),
            },
        },
        extractStyles: true,
        globalStyles: false,
    })
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);
