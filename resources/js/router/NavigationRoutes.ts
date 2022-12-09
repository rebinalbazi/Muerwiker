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
            displayName: 'Home',
        },
        {
            name: '/:art',
            displayName: 'Stadt / Bereich',
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
        displayName: 'Ansprechpartner',
    },
    routesAdmin: [
        {
            name: 'ansprechpartner',
            displayName: 'Ansprechpartner',
        },
        {
            name: 'wohnen',
            displayName: 'Wohnen',
        },
        {
            name: 'arbeit',
            displayName: 'Arbeit',
        },
        {
            name: 'tagesstaette',
            displayName: 'Tagesstätte',
        },
        {
            name: 'verwaltung',
            displayName: 'Verwaltung',
        },
        {
            name: 'sonstige',
            displayName: 'Sonstige',
        }
    ] as INavigationRoute[],
}
