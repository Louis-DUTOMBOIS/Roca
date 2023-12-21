import './bootstrap';
import.meta.glob([
    '../images/**',
    '../fonts/**',
]);


// Fonction pour observer les changements d'intersection
function handleIntersection(entries, observer) {
    console.log(entries);
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            console.log(true);
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}

// Sélectionnez tous les éléments à observer
const targetsElements = document.querySelectorAll('.scroll'); 

// Créez une instance IntersectionObserver pour chaque élément cible
targetsElements.forEach((element) => {
    const observer = new IntersectionObserver(handleIntersection, {
        root: null, // Utilisez la fenêtre comme zone d'affichage par défaut
        rootMargin: '0px', // Aucune marge autour de la fenêtre d'affichage
        threshold: 0.1, // Le seuil à partir duquel l'élément est considéré comme visible
    });
    // Commencez l'observation de l'élément cible
    observer.observe(element);
});

