const LoginPage = () => import('~/pages/auth/login').then(m => m.default || m)
const PasswordEmailPage = () => import('~/pages/auth/password/email').then(m => m.default || m)
const PasswordResetPage = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const NotFoundPage = () => import('~/pages/errors/404').then(m => m.default || m)

const HomePage = () => import('~/pages/home').then(m => m.default || m)
const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsSecurity = () => import('~/pages/settings/security').then(m => m.default || m)

export default [
  { path: '/login', name: 'auth.login', component: LoginPage },
  { path: '/password/reset', name: 'auth.password.request', component: PasswordEmailPage },
  { path: '/password/reset/:token', name: 'auth.password.reset', component: PasswordResetPage },
  
  { path: '/', name: 'home', component: HomePage },
  { path: '/settings',
    component: Settings,
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: SettingsProfile },
      { path: 'security', name: 'settings.security', component: SettingsSecurity }
    ] },
  { path: '*', component: NotFoundPage }
]
