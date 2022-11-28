const mix = require("laravel-mix")
const MixGlob = require("laravel-mix-glob")
const sidebarItems = require("./resources/sidebar-items.json")
const horizontalMenuItems = require("./resources/horizontal-menu-items.json")
require("laravel-mix-nunjucks")

// String constants
const assetsPath = "resources/assets/"

// Create MixGlob instance
const mixGlob = new MixGlob({ mix }) // mix is required

// Files loaded from css url()s will be placed alongside our resources
mix.options({
    fileLoaderDirs: {
        fonts: "assets/fonts",
        images: "assets/images",
    },
})

// Modules and extensions
const modulesToCopy = {
    "@icon/dripicons": false,
    "@fortawesome/fontawesome-free": false,
    "rater-js": false,
    "bootstrap-icons": false,
    apexcharts: true,
    "perfect-scrollbar": true,
    filepond: true,
    "filepond-plugin-image-preview": true,
    "feather-icons": true,
    dragula: true,
    dayjs: false,
    "chart.js": true,
    "choices.js": false,
    parsleyjs: true,
    sweetalert2: true,
    summernote: true,
    jquery: true,
    quill: true,
    tinymce: false,
    "toastify-js": false,
    "datatables.net-bs5": false,
    "simple-datatables": true, // With public folder = true
}
for (const mod in modulesToCopy) {
    let modulePath = `node_modules/${mod}`
    if (modulesToCopy[mod]) modulePath += "/dist"

    mix.copy(modulePath, `public/assets/extensions/${mod}`)
}

mixGlob
    // Attention: put all generated css files directly into a subfolder
    // of assets/css. Resource loading might fail otherwise.
    .sass(`${assetsPath}scss/app.scss`, "assets/css/main")
    .sass(`${assetsPath}scss/themes/dark/app-dark.scss`, "assets/css/main")
    .sass(`${assetsPath}scss/pages/*.scss`, "assets/css/pages")
    .sass(`${assetsPath}scss/widgets/*.scss`, "assets/css/widgets")
    .sass(`${assetsPath}scss/iconly.scss`, "assets/css/shared")
    .js(`${assetsPath}js/*.js`, "assets/js")

// Copying assets
mix
    .copy("resources/assets/images", "public/assets/images")
    .copy(
        "node_modules/bootstrap-icons/bootstrap-icons.svg",
        "public/assets/images"
    )
    .copy(`${assetsPath}js/pages`, "public/assets/js/pages")
    // We place all generated css in /assets/css/xxx
    // This is the relative path to the fileLoaderDirs we specified above
    .setResourceRoot("../../../")
    .setPublicPath("public")

// Nunjucks Templating
mix.njk("resources/*.html", "public/", {
    ext: ".html",
    watch: true,
    data: {
        web_title: "Mazer Admin Dashboard",
        sidebarItems,
        horizontalMenuItems,
    },
    block: "content",
    envOptions: {
        watch: true,
        noCache: true,
    },
    manageEnv: (nunjucks) => {
        nunjucks.addFilter("containString", (str, containStr) => {
            if (!str.length) return false
            return str.indexOf(containStr) >= 0
        })
        nunjucks.addFilter("startsWith", (str, targetStr) => {
            if (!str.length) return false
            return str.startsWith(targetStr)
        })
    },
})

// Browsersync
mix.browserSync({
    files: ["resources/scss/*.scss", "resources/**/*.html", "resources/assets/js/**/*.js"],
    server: "public",
    port: 3003,
})
