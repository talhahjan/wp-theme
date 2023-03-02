<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dashti
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body
 <?php body_class(); ?>>
<div class="wrapper">
<button
      class="fixed bottom-5 right-7 z-50 bg-primary shadow-md hover:shadow-primary/50 cursor-pointer text-inverted w-8 h-8 rounded-md"
      id="goToTopBtn"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        fill="currentColor"
        class="bi bi-arrow-up-short m-auto"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"
        />
      </svg>
    </button>

      <!-- ============== Header section start ============== -->
   
      <header>
        <!-- ============== navbar start  ============== -->
        <nav
          class="fixed top-0 w-full max-w-5xl font-Courgette z-50 px-4 backdrop-blur-lg transition-colors duration-5 bg-white dark:bg-opacity-5"
          id="nav-bar"
          >
          <div
            class="nav-wrapper flex justify-between items-center h-12 leading-12"
          >
            <div class="toggle md:hidden" id="toggler">
              <button
                class="dark:text-color-base-dark-alt hover:text-color-base-alt dark:hover:text-color-base-dark duration-300"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                </svg>
              </button>
            </div>
            <div
              class="brand font-semibold select-none dark:text-color-base-dark-alt"
            >
              Code360
            </div>
            <ul
              class="absolute -left-full top-14 bg-gray-900/90 md:bg-inherit duration-300 md:transition-none h-screen w-[70vw] md:h-full md:w-auto md:static flex flex-col md:flex-row items-start md:justify-center md:items-center gap-2 z-100 capitalize pt-5 md:pt-0"
              id="nav-menu"
            >
              <li class="w-full px-5 md:px-0 md:w-auto">
                <a
                  href="<?php site_url()?>"
                  class="flex md:text-color-base md:dark:text-color-base-dark-alt md:hover:text-color-base-alt dark:md:hover:text-color-base-dark p-2 items-center gap-4 w-full text-inverted hover:text-inverted hover:bg-gradient-to-l from-primary to-primary-alt md:hover:bg-none rounded-md relative md:after:absolute md:after:left-2/5 md:after:right-2/4 md:after:bottom-1 md:after:h-0.5 md:after:w-0 md:after:hover:w-2/4 md:after:focus:w-2/4 md:after:duration-500 md:after:translate-x-2/4 md:after:translate-y-2/4 md:after:bg-primary md:shadow-none duration-300"
                >
                  <span class="md:hidden inline-block">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-house"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
                      />
                    </svg>
                  </span>
                  <span>Home</span>
                </a>
              </li>

              <li class="w-full px-5 md:px-0 md:w-auto">
                <a
                  href="<?php echo get_site_url()?>/portpolio"
                  class="flex md:text-color-base md:dark:text-color-base-dark-alt md:hover:text-color-base-alt dark:md:hover:text-color-base-dark p-2 items-center gap-4 w-full text-inverted hover:text-inverted hover:bg-gradient-to-l from-primary to-primary-alt md:hover:bg-none rounded-md relative md:after:absolute md:after:left-2/5 md:after:right-2/4 md:after:bottom-1 md:after:h-0.5 md:after:w-0 md:after:hover:w-2/4 md:after:focus:w-2/4 md:after:duration-500 md:after:translate-x-2/4 md:after:translate-y-2/4 md:after:bg-primary md:shadow-none duration-300"
                >
                  <span class="md:hidden inline-block">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-images"
                      viewBox="0 0 16 16"
                    >
                      <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                      <path
                        d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"
                      />
                    </svg>
                  </span>
                  <span>Fortpolio</span>
                </a>
              </li>

              <li class="w-full px-5 md:px-0 md:w-auto">
                <a
                  href="<?php echo get_site_url()?>/about-us"
                  class="flex md:text-color-base md:dark:text-color-base-dark-alt md:hover:text-color-base-alt dark:md:hover:text-color-base-dark p-2 items-center gap-4 w-full text-inverted hover:text-inverted hover:bg-gradient-to-l from-primary to-primary-alt md:hover:bg-none rounded-md relative md:after:absolute md:after:left-2/5 md:after:right-2/4 md:after:bottom-1 md:after:h-0.5 md:after:w-0 md:after:hover:w-2/4 md:after:focus:w-2/4 md:after:duration-500 md:after:translate-x-2/4 md:after:translate-y-2/4 md:after:bg-primary md:shadow-none duration-300"
                >
                  <span class="md:hidden inline-block">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-file-earmark-text"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"
                      />
                      <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"
                      />
                    </svg>
                  </span>
                  <span>About Us</span>
                </a>
              </li>

              <li class="w-full px-5 md:px-0 md:w-auto">
                <a
                  href="<?php echo get_site_url()?>/contact-us"
                  class="flex md:text-color-base md:dark:text-color-base-dark-alt md:hover:text-color-base-alt dark:md:hover:text-color-base-dark p-2 items-center gap-4 w-full text-inverted hover:text-inverted hover:bg-gradient-to-l from-primary to-primary-alt md:hover:bg-none rounded-md relative md:after:absolute md:after:left-2/5 md:after:right-2/4 md:after:bottom-1 md:after:h-0.5 md:after:w-0 md:after:hover:w-2/4 md:after:focus:w-2/4 md:after:duration-500 md:after:translate-x-2/4 md:after:translate-y-2/4 md:after:bg-primary md:shadow-none duration-300"
                >
                  <span class="md:hidden inline-block">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-envelope"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"
                      />
                    </svg>
                  </span>
                  <span>Contact Us</span>
                </a>
              </li>
            </ul>

 <div class="grid grid-flow-col gap-x-5 items-center">






<div class="relative" role="button" id="search">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
<path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
</svg>
<form method="get" action="<?php home_url('/')?>" class="absolute top-10 z-0 right-0 scale-0 origin-center duration-300 min-w-[250px] inline-flex search-bar">
<input type="text" name="s" placeholder="search blog .." class="block w-full rounded-r-none peer bg-white darK:bg-opacity-100">
<button class="bg-primary text-inverted p-2 rounded-r-md shadow-md peer-focus:shadow-primary">
<svg xmlns="http://www.w3.org/2000/svg" 
width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
<path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
</svg>
</button>



</form>
</div>


              <div class="relative w-5 h-full dropdown">
                <button
                  class="dropdown-toggle dark:text-color-base-dark-alt hover:text-color-base-alt dark:hover:text-color-base-dark duration-300 link"
                  type="button"
                  id="themeIcon"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-display"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z"
                    />
                  </svg>
                </button>

                <ul
                  class="absolute left-0 top-[calc(100%_+_.80rem)] -translate-y-2 hidden duration-300 bg-white dark:bg-slate-800 text-base z-50 rounded-lg shadow-lg py-2 dropdown-menu"
                  aria-labelledby="themeIcon"
                >
                  <li>
                    <fieldset class="font-serif">
                      <input
                        type="radio"
                        class="hidden peer"
                        name="theme"
                        id="dark"
                      />
                      <label
                        for="dark"
                        class="flex items-center gap-2 w-full py-2 px-4 duration-300 text-sm font-normal whitespace-nowrap cursor-pointer hover:bg-slate-800/20 dark:hover:bg-gray-500/50 peer-checked:bg-primary peer-checked:text-inverted"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-moon-stars-fill"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
                          />
                          <path
                            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
                          />
                        </svg>
                        <span>Dark</span>
                      </label>
                    </fieldset>
                  </li>

                  <li>
                    <fieldset class="font-serif">
                      <input
                        type="radio"
                        class="hidden peer"
                        name="theme"
                        id="light"
                        checked
                      />
                      <label
                        for="light"
                        class="flex items-center gap-2 w-full py-2 px-4 duration-300 text-sm font-normal whitespace-nowrap cursor-pointer hover:bg-slate-800/20 dark:hover:bg-gray-500/50 peer-checked:bg-primary peer-checked:text-inverted"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          height="16"
                          width="16"
                          viewBox="0 0 48 48"
                          fill="currentColor"
                        >
                          <path
                            d="M24 31q2.9 0 4.95-2.05Q31 26.9 31 24q0-2.9-2.05-4.95Q26.9 17 24 17q-2.9 0-4.95 2.05Q17 21.1 17 24q0 2.9 2.05 4.95Q21.1 31 24 31Zm0 3q-4.15 0-7.075-2.925T14 24q0-4.15 2.925-7.075T24 14q4.15 0 7.075 2.925T34 24q0 4.15-2.925 7.075T24 34ZM3.5 25.5q-.65 0-1.075-.425Q2 24.65 2 24q0-.65.425-1.075Q2.85 22.5 3.5 22.5h5q.65 0 1.075.425Q10 23.35 10 24q0 .65-.425 1.075-.425.425-1.075.425Zm36 0q-.65 0-1.075-.425Q38 24.65 38 24q0-.65.425-1.075.425-.425 1.075-.425h5q.65 0 1.075.425Q46 23.35 46 24q0 .65-.425 1.075-.425.425-1.075.425ZM24 10q-.65 0-1.075-.425Q22.5 9.15 22.5 8.5v-5q0-.65.425-1.075Q23.35 2 24 2q.65 0 1.075.425.425.425.425 1.075v5q0 .65-.425 1.075Q24.65 10 24 10Zm0 36q-.65 0-1.075-.425-.425-.425-.425-1.075v-5q0-.65.425-1.075Q23.35 38 24 38q.65 0 1.075.425.425.425.425 1.075v5q0 .65-.425 1.075Q24.65 46 24 46ZM12 14.1l-2.85-2.8q-.45-.45-.425-1.075.025-.625.425-1.075.45-.45 1.075-.45t1.075.45L14.1 12q.4.45.4 1.05 0 .6-.4 1-.4.45-1.025.45-.625 0-1.075-.4Zm24.7 24.75L33.9 36q-.4-.45-.4-1.075t.45-1.025q.4-.45 1-.45t1.05.45l2.85 2.8q.45.45.425 1.075-.025.625-.425 1.075-.45.45-1.075.45t-1.075-.45ZM33.9 14.1q-.45-.45-.45-1.05 0-.6.45-1.05l2.8-2.85q.45-.45 1.075-.425.625.025 1.075.425.45.45.45 1.075t-.45 1.075L36 14.1q-.4.4-1.025.4-.625 0-1.075-.4ZM9.15 38.85q-.45-.45-.45-1.075t.45-1.075L12 33.9q.45-.45 1.05-.45.6 0 1.05.45.45.45.45 1.05 0 .6-.45 1.05l-2.8 2.85q-.45.45-1.075.425-.625-.025-1.075-.425ZM24 24Z"
                          />
                        </svg>
                        Light</label
                      >
                    </fieldset>
                  </li>

                  <li>
                    <fieldset class="font-serif">
                      <input
                        type="radio"
                        class="hidden peer"
                        name="theme"
                        id="system"
                      />
                      <label
                        for="system"
                        class="flex items-center gap-2 w-full py-2 px-4 duration-300 text-sm font-normal whitespace-nowrap cursor-pointer hover:bg-slate-800/20 dark:hover:bg-gray-500/50 peer-checked:bg-primary peer-checked:text-inverted"
                        data-dropdown-button
                        ><svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                          class="system"
                        >
                          <path
                            d="M20 3H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h7v2H8v2h8v-2h-3v-2h7c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 14V5h16l.002 9H4z"
                          ></path>
                        </svg>
                        system</label
                      >
                    </fieldset>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <!-- ============== nav bar end  ============== -->
      </header>

      <!-- ============== Header section end ============== -->
