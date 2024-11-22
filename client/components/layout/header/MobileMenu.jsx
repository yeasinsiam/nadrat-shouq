import Link from "next/link";
import { useEffect, useRef, useState, forwardRef } from "react";

export default function MobileMenu({ NavigationLink }) {
  const mobileMenuElement = useRef();
  const mobileMenuButton = useRef();
  const [show, setShow] = useState(false);

  const hideMenu = () => {
    setShow(false);
  };

  useEffect(() => {
    /**
     * show(false) if clicked on outside of mobileMenuElement
     */
    function handleClickOutside(event) {
      if (
        mobileMenuElement.current &&
        mobileMenuButton.current &&
        !mobileMenuButton.current.contains(event.target) &&
        !mobileMenuElement.current.contains(event.target)
      ) {
        hideMenu();
      }
    }
    // Bind the event listener
    document.addEventListener("mousedown", handleClickOutside);
    return () => {
      // Unbind the event listener on clean up
      document.removeEventListener("mousedown", handleClickOutside);
    };
  }, [mobileMenuElement, mobileMenuButton]);

  return (
    <div className="relative">
      <MenuBarIcon
        ref={mobileMenuButton}
        onClick={() => setShow((show) => !show)}
        aria-expanded={show}
      />

      <div
        ref={mobileMenuElement}
        aria-expanded={show}
        className=" absolute  min-w-[200px] top-9 right-0 p-3 rounded-md bg-white border-2 shadow-lg 
         invisible z-50 opacity-0 -translate-y-3 duration-200
          aria-expanded:visible aria-expanded:opacity-100 aria-expanded:translate-y-0"
      >
        <ul className="divide-y-2">
          <li>
            <NavigationLink href="/about-us" onClick={hideMenu}>
              About Us
            </NavigationLink>
          </li>
          <li>
            <NavigationLink href="/contact-us" onClick={hideMenu}>
              Contact Us
            </NavigationLink>
          </li>
        </ul>
      </div>
    </div>
  );
}

const NavigationLink = ({ href, children, ...props }) => (
  <Link
    href={href}
    className={({ isActive }) =>
      `${
        isActive
          ? "font-bold text-zinc-900 underline"
          : "font-semibold text-zinc-700"
      }  block py-1 whitespace-nowrap text-base sm:text-lg transition hover:underline decoration-[1.5px]`
    }
    {...props}
  >
    {children}
  </Link>
);

const MenuBarIcon = forwardRef((props, ref) => (
  <button
    ref={ref}
    className="group relative flex overflow-hidden items-center justify-center  w-[23px] h-[23px] "
    {...props}
  >
    <div className=" flex flex-col justify-between w-[17px] h-[17px] transform transition-all duration-300 origin-center ">
      <div className="bg-zinc-900 h-[2px] w-7 transform transition-all duration-300 origin-left group-aria-expanded:translate-x-10"></div>
      <div className="bg-zinc-900 h-[2px] w-7 rounded transform transition-all duration-300 group-aria-expanded:translate-x-10 delay-75"></div>
      <div className="bg-zinc-900 h-[2px] w-7 transform transition-all duration-300 origin-left group-aria-expanded:translate-x-10 delay-150"></div>

      <div className=" absolute items-center justify-between transform transition-all duration-500 top-[9px] -translate-x-10 group-aria-expanded:-translate-x-[2px] flex w-0 group-aria-expanded:w-16">
        <div className="absolute bg-zinc-900 h-[2px] w-[22px] transform transition-all duration-500 rotate-0 delay-300 group-aria-expanded:rotate-45"></div>
        <div className="absolute bg-zinc-900 h-[2px] w-[22px] transform transition-all duration-500 -rotate-0 delay-300 group-aria-expanded:-rotate-45"></div>
      </div>
    </div>
  </button>
));
MenuBarIcon.displayName = "MenuBarIcon";
