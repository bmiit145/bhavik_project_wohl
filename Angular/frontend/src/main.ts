import { bootstrapApplication } from '@angular/platform-browser';
import { provideAnimations } from '@angular/platform-browser/animations';
import { provideHttpClient, withInterceptors } from '@angular/common/http';
import { provideRouter } from '@angular/router';

import { AppComponent } from './app/app.component';
import { appRoutes } from './app/app.routes';
import { apiPrefixInterceptor } from './app/core/services/api-prefix.interceptor';
import { authTokenInterceptor } from './app/core/services/auth-token.interceptor';

bootstrapApplication(AppComponent, {
  providers: [
    provideAnimations(),
    provideHttpClient(withInterceptors([apiPrefixInterceptor, authTokenInterceptor])),
    provideRouter(appRoutes)
  ]
}).catch(err => console.error(err));