 <style lang="css">
   .home-reset {
     margin-block-start: 1.5rem;
     display: flex;
     justify-content: center;

     gap: 50px;
   }

   .home-reset .hr-link {
     font-size: 1rem;
     text-transform: uppercase;

     display: inline-block;
     cursor: pointer;
     text-decoration: none;
     color: var(--clr-neon);
     border: var(--clr-neon) 0.125em solid;
     padding: 0.25em 1em;
     border-radius: 0.25em;

     text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.5), 0 0 0.45em currentColor;

     box-shadow: inset 0 0 0.5em 0 var(--clr-neon), 0 0 0.5em 0 var(--clr-neon),
       0 0 0.5em 0 var(--clr-neon);

     position: relative;
   }

   .home-reset .hr-link::before {
     pointer-events: none;
     content: "";
     position: absolute;
     background: var(--clr-neon);
     top: 120%;
     left: 0;

     width: 100%;
     height: 100%;

     transform: Perspective(1em) rotateX(40deg) scale(1, 0.5);
     filter: blur(1em);
     opacity: 0.8;
   }

   .home-reset .hr-link::after {
     content: "";
     position: absolute;
     top: 0;
     bottom: 0;
     left: 0;
     right: 0;
     box-shadow: 0 0 1em 0.5em var(--clr-neon);
     opacity: 0;
     background-color: var(--clr-neon);
     z-index: -1;
     transition: opacity 150ms linear;
   }

   .home-reset .hr-link:hover,
   .home-reset .hr-link:focus {
     color: var(--clr-bg);
   }

   .home-reset .hr-link:hover::before,
   .home-reset .hr-link:hover:focus::before {
     opacity: 1;
   }

   .home-reset .hr-link:hover::after {
     opacity: 1;
   }

   .home-reset .active {
     background: #f6652c;
   }
 </style>
 <div class="home-reset">
   <a href="#" class="home hr-link">Home</a>
   <a href="#" class="profile hr-link">Reset</a>
 </div>
 <script>
   document.querySelector('.home').onclick = () => {
     location.href = '/listgames.php'
   }
 </script>