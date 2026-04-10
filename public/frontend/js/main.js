
        // Smooth scroll for nav links
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const target = document.querySelector(a.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Scroll-based navbar shadow
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 10) {
                nav.style.boxShadow = '0 4px 24px rgba(0,0,0,0.08)';
            } else {
                nav.style.boxShadow = 'none';
            }
        });
