export interface INavigationRoute {
    name: string
    displayName: string
    meta: { icon: string }
    children?: INavigationRoute[]
}

export default {
    rootUser: {
        name: '/',
        displayName: '/',
    },
    routesUser: [
        {
            name: '/',
            displayName: 'Art',
        },
        {
            name: '/:art',
            displayName: 'Ort / Bereich',
        },
        {
            name: '/:art/:ort',
            displayName: 'Standort',
        },
        {
            name: '/:art/:ort/:infos',
            displayName: 'Infos',
        }
    ] as INavigationRoute[],
    rootAdmin: {
        name: 'admin',
        displayName: 'Admin',
    },
    routesAdmin: [
        {
            name: 'art',
            displayName: 'Art',
        },
        {
            name: 'ort',
            displayName: 'Ort',
        },
        {
            name: 'standort',
            displayName: 'Standort',
        },
        {
            name: 'infos',
            displayName: 'Infos',
        }
    ] as INavigationRoute[],
}
