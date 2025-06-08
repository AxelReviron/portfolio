import frHome from './fr/home'
import frLegal from './fr/legal'
import frPrivacy from './fr/privacy'

import enHome from './en/home'
import enLegal from './en/legal'
import enPrivacy from './en/privacy'

export default {
    fr: {
        ...frHome,
        ...frLegal,
        ...frPrivacy,
    },
    en: {
        ...enHome,
        ...enLegal,
        ...enPrivacy,
    }
}
