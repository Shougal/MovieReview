window.addEventListener('load', function() {
    document.getElementById('review-form').addEventListener('submit', function(submission) {
        const error_message = function() {
            const groups = document.querySelectorAll('.star-rating');
            for (let i = 0; i < groups.length; i++) {
                const group = groups[i];
                let valid_group = false;
                const stars = group.querySelectorAll('.star');
                for (let j = 0; j < stars.length; j++) {
                    if (stars[j].classList.contains('checked')) {
                        valid_group = true;
                        break;
                    }
                }
                if (!valid_group) {
                    return "All ratings are required";
                }
            }
            return null;
        }();
        if (error_message !== null) {
            submission.preventDefault();
            document.getElementById("message").innerHTML = "<div class=\'alert alert-danger\' role=\'alert\'>" + error_message + "</div>";
        }
    });

    document.querySelectorAll('.star-rating').forEach(container => {
        container.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', e => {
                let starNum = 0;
                if(star.htmlFor.length === 5){
                    starNum = parseInt(star.htmlFor.substring(4,5));
                } else {
                    starNum = parseInt(star.htmlFor.substring(4,6));
                }
                let starNumBeginning = 0;
                for (let i=starNum; i>(starNum-5); i--) {
                    if (i%5 === 0){
                        starNumBeginning = i
                        break;
                    }
                }
                document.querySelectorAll('.star-rating').forEach(newContainer => {
                    newContainer.querySelectorAll('.star').forEach(newStar => {
                        let newStarNum = 0;
                        if(newStar.htmlFor.length === 5){
                            newStarNum = parseInt(newStar.htmlFor.substring(4,5));
                        } else {
                            newStarNum = parseInt(newStar.htmlFor.substring(4,6));
                        }
                        if((newStarNum >= starNumBeginning) && (newStarNum < starNumBeginning + 5)){
                            if(newStarNum > starNum){
                                newStar.classList.remove('checked');
                            }
                            else {
                                newStar.classList.add('checked');
                            }
                        }
                    });
                });
            });
            star.addEventListener('mouseenter', e => {
                let starNum = 0;
                if (star.htmlFor.length === 5) {
                    starNum = parseInt(star.htmlFor.substring(4, 5));
                } else {
                    starNum = parseInt(star.htmlFor.substring(4, 6));
                }
                let starNumBeginning = 0;
                for (let i = starNum; i > (starNum - 5); i--) {
                    if (i % 5 === 0) {
                        starNumBeginning = i
                        break;
                    }
                }
                document.querySelectorAll('.star-rating').forEach(newContainer => {
                    newContainer.querySelectorAll('.star').forEach(newStar => {
                        let newStarNum = 0;
                        if (newStar.htmlFor.length === 5) {
                            newStarNum = parseInt(newStar.htmlFor.substring(4, 5));
                        } else {
                            newStarNum = parseInt(newStar.htmlFor.substring(4, 6));
                        }
                        if ((newStarNum >= starNumBeginning) && (newStarNum < starNumBeginning + 5)) {
                            if (newStarNum > starNum) {
                                newStar.classList.remove('hovering');
                            } else {
                                newStar.classList.add('hovering');
                            }
                        }
                    });
                });
            });
            star.addEventListener('mouseleave', e => {
                let starNum = 0;
                if (star.htmlFor.length === 5) {
                    starNum = parseInt(star.htmlFor.substring(4, 5));
                } else {
                    starNum = parseInt(star.htmlFor.substring(4, 6));
                }
                let starNumBeginning = 0;
                for (let i = starNum; i > (starNum - 5); i--) {
                    if (i % 5 === 0) {
                        starNumBeginning = i
                        break;
                    }
                }
                document.querySelectorAll('.star-rating').forEach(newContainer => {
                    newContainer.querySelectorAll('.star').forEach(newStar => {
                        let newStarNum = 0;
                        if (newStar.htmlFor.length === 5) {
                            newStarNum = parseInt(newStar.htmlFor.substring(4, 5));
                        } else {
                            newStarNum = parseInt(newStar.htmlFor.substring(4, 6));
                        }
                        if ((newStarNum >= starNumBeginning) && (newStarNum < starNumBeginning + 5)) {
                            newStar.classList.remove('hovering');
                        }
                    });
                });
            });
        });
    });

});
window.addEventListener('beforeunload', function() {
    document.getElementById("message").innerHTML = "";
})

