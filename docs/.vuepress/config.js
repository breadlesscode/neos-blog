module.exports = {
  title: "Neos-Blog Documentation",
  base: "/neos-blog/",
  themeConfig: {
    nav: [
      {
        text: "Github",
        link: "https://github.com/breadlesscode/neos-blog"
      },
      {
        text: "Example",
        link: "https://github.com/breadlesscode/neos-blog-example"
      },
    ],
    sidebar: [
      ["/", "Home"],
      ["/configuration.html", "Configuration"],
      ["/fusion-prototypes.html", "Fusion prototypes"],
      ["/nodetypes.html", "NodeTypes"],
      ["/flowquery.html", "FlowQuery"],
      ["/eel-helpers.html", "Eel Helpers"],
      ["/how-tos.md", "How-Tos"]
    ]
  }
};
