import { inject } from '@angular/core';
import { CanActivateFn, Router } from '@angular/router';
import { AdminSessionService } from './admin-session.service';

export const adminAuthGuard: CanActivateFn = () => {
  const adminSession = inject(AdminSessionService);
  const router = inject(Router);

  if (adminSession.isAuthenticated()) {
    return true;
  }

  return router.parseUrl('/admin/login');
};
