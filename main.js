const pages = {
    "home": {
        route: "home",
        content: `
        <div>
            <h1>Welcome home!</h1>
            <a href="${_}/second">To second page</a>
        </div>`
    },
    "second": {
        route: "second",
        content: `
        <div>
            <h1>This is the second page!</h1>
            <a href="${_}/home">Go home</a>
        </div>`
    }
};

function init() {
    document.title = routes[route].title;
    renderCurrentPage();
}

function render(content) {
    document.getElementById("root").innerHTML = content;
}

function renderCurrentPage() {
    render(pages[route].content);

    initEventHandlers();
}

function initEventHandlers() {
    document.querySelectorAll("a").forEach(a => {
        a.addEventListener("click", event => {
            const href = a.getAttribute("href");

            if (href[0] === "/") {
                const newRoute = href.replace(_, "").replace("/", "");

                event.preventDefault();

                window.history.pushState(routes[newRoute], routes[newRoute].title, href);
                route = newRoute;
                init();
            }
        });
    });
}

init();