export default [
    {
        title: 'Home',
        route: 'home',
        icon: 'HomeIcon',
    },
    {
        title: 'Users',
        route: 'browse-users',
        icon: 'UsersIcon',
    },
    {
        title: 'Sites',
        route: 'browse-sites',
        icon: 'TvIcon',
    },
    {
        title: 'Product Categories',
        route: 'browse-categories',
        icon: 'BoxIcon',
    },
    {
        title: 'Products',
        route: 'browse-products',
        icon: 'PackageIcon',
    },
    {
        title: 'Sliders',
        route: 'browse-sliders',
        icon: 'AirplayIcon',
    },
    {
        title: 'Testimonials',
        route: 'browse-testimonials',
        icon: 'ThumbsUpIcon',
    },
    {
        title: 'News',
        route: 'browse-news',
        icon: 'FileTextIcon',
    },
    {
        title: 'Settings',
        icon: 'ShieldIcon',
        children: [
            {
                route: 'browse-roles',
                title: 'Roles & Permissions',
            },
        ],
    },
]
