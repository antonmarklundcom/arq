// Global smooth-scroll engine: Lenis drives the scroll, GSAP ScrollTrigger reads from it.
// Imported once per page that needs scroll-driven motion. Respects prefers-reduced-motion.
import Lenis from 'lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
  const lenis = new Lenis({
    duration: 1.1,
    easing: (t: number) => 1 - Math.pow(1 - t, 3),
    smoothWheel: true,
  });

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);
}

// Generic scroll-reveal: any [data-reveal] element fades/rises into place once.
document.querySelectorAll<HTMLElement>('[data-reveal]').forEach((el) => {
  gsap.fromTo(
    el,
    { autoAlpha: 0, y: 32 },
    {
      autoAlpha: 1,
      y: 0,
      duration: reduceMotion ? 0.01 : 1,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: el,
        start: 'top 85%',
        once: true,
      },
    }
  );
});

// Rules that draw themselves in on scroll — the editorial "line drawing" device.
document.querySelectorAll<HTMLElement>('[data-reveal-rule]').forEach((el) => {
  gsap.fromTo(
    el,
    { scaleX: 0 },
    {
      scaleX: 1,
      duration: reduceMotion ? 0.01 : 1.1,
      ease: 'power3.inOut',
      transformOrigin: 'left center',
      scrollTrigger: {
        trigger: el,
        start: 'top 90%',
        once: true,
      },
    }
  );
});

export {};
