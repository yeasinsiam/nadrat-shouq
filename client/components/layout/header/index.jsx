import Link from "next/link";
import React, { useState } from "react";
import BrandLogo from "../../svg-icons/BrandLogo";
import DesktopSearch from "./DesktopSearch";
import MobileSearch from "./MobileSearch";
import MobileMenu from "./MobileMenu";
import { useRouter } from "next/router";

const Header = () => {
  return (
    <header className="sticky top-0 z-50 bg-white border-b  py-3">
      <div className="cs-container  flex items-center justify-between">
        {/* BrandLogo */}
        <Link href="/" className="flex items-center -space-x-3">
          <BrandLogo className="w-16 h-12 sm:w-24 sm:h-16 bg-transparent" />
          <span className="hidden sm:block text-center text-lg leading-5 font-medium text-red-600">
            NADRAT SHOUQ
            <br />
            EST
          </span>
        </Link>
        <HeaderNav />
      </div>
    </header>
  );
};

const NavigationLink = ({ href, children, ...props }) => {
  const router = useRouter();

  return (
    <Link
      href={href}
      className={`${
        router.pathname == href
          ? "font-bold text-zinc-900 underline"
          : "font-semibold text-zinc-700"
      }  block py-1 whitespace-nowrap text-base sm:text-lg transition hover:underline decoration-[1.5px]`}
      {...props}
    >
      {children}
    </Link>
  );
};

const HeaderNav = ({ hide = false }) => {
  const [search, setSearch] = useState("");
  return (
    <>
      {/* <!-- Desktop Search --> */}
      {/* <div
        aria-hidden={hide}
        className="hidden md:block 
           transition-opacity duration-500 opacity-100 aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:-z-[999]"
      >
        <DesktopSearch {...{ search, setSearch }} />
      </div> */}
      {/* <!-- Mobile Nav --> */}
      <div
        aria-hidden={hide}
        className="flex items-center space-x-1 px-2 py-1
           md:hidden 
            transition-opacity duration-500 opacity-100 aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:-z-[999]"
      >
        <MobileMenu NavigationLink={NavigationLink} />
      </div>
      {/* <div
        aria-hidden={hide}
        className="flex items-center space-x-1 px-2 py-1 border-2 shadow-md rounded-3xl
           md:hidden 
            transition-opacity duration-500 opacity-100 aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:-z-[999]"
      >
        <MobileSearch {...{ search, setSearch }} />
        <MobileMenu NavigationLink={NavigationLink} />
      </div> */}
      {/* <!-- Desktop Nav --> */}
      <ul
        aria-hidden={hide}
        className="hidden md:flex items-center space-x-3  
        transition-opacity duration-500 opacity-100 aria-hidden:opacity-0 aria-hidden:absolute aria-hidden:-z-[999]"
      >
        <li>
          <NavigationLink href="/about-us">About Us</NavigationLink>
        </li>
        <li>
          <NavigationLink href="/contact-us">Contact Us</NavigationLink>
        </li>
      </ul>
    </>
  );
};

export default Header;
