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
            displayName: 'Mitarbeiter',
        },
        {
            name: 'wohnen',
            displayName: 'Wohnort',
        },
        {
            name: 'arbeit',
            displayName: 'Arbeitsort',
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
