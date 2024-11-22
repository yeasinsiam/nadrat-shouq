import { FaSearch } from "react-icons/fa";

const DesktopSearch = ({ search, setSearch }) => {
  return (
    <div className="group  flex box-content border-gradient-animate  rounded-3xl  py-2 px-2">
      {/* //   bg-gradient-to-r
    // from-pink-500
    // via-red-500
    // to-indigo-500 */}
      <div className="ml-[3px] cursor-pointer p-2 rounded-full background-gradient-animate">
        <FaSearch className="fill-white stroke-1 text-md " />
      </div>
      <input
        type="text"
        onChange={(e) => setSearch(e.target.value)}
        value={search}
        placeholder="Type to search..."
        className=" outline-none pl-2 text-md w-52  border-none "
      />
    </div>
  );
};

export default DesktopSearch;
