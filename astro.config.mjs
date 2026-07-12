import { defineConfig } from 'astro/config';

// Static output — deploys as plain files to Hostinger shared hosting.
// The one dynamic piece (lead form) is a standalone PHP endpoint, not part of the Astro build.
export default defineConfig({
  site: 'https://arq.com.py',
  trailingSlash: 'ignore',
  build: {
    format: 'directory',
  },
});
