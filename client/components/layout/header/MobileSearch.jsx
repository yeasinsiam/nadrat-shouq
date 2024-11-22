import { useRef, useState, useEffect } from "react";
import { FaSearch } from "react-icons/fa";

const MobileSearch = ({ search, setSearch }) => {
  const inputEl = useRef();
  const [show, setShow] = useState(false);

  useEffect(() => {
    if (show && inputEl.current) inputEl.current.focus();
  }, [show]);
  return (
    <div
      aria-expanded={show}
      className="group relative flex p-0 rounded-3xl transition-[background] duration-75  aria-expanded:p-2 aria-expanded:border-gradient-animate "
    >
      <div
        onClick={() => setShow(true)}
        className="cursor-pointer static  p-[7px] rounded-full background-gradient-animate left-0 top-1/2 transition-[rotate] duration-500  group-aria-expanded:absolute group-aria-expanded:ml-[6px]  group-aria-expanded:-translate-y-1/2 group-aria-expanded:rotate-[90deg]"
      >
        <FaSearch className="fill-white stroke-1 text-sm" />
      </div>
      <input
        type="text"
        ref={inputEl}
        value={search}
        placeholder="Type to search..."
        onChange={(e) => setSearch(e.target.value)}
        onBlur={() => !search && setShow(false)}
        className="outline-none pl-0 text-sm w-0 duration-500 border-none group-aria-expanded:pl-8 group-aria-expanded:w-52"
      />
    </div>
  );
};

export default MobileSearch;
