import Link from "next/link";
import { BiSolidPhoneCall } from "react-icons/bi";

const MobileContactFixedBtn = () => {
  return (
    <Link
      href="/contact-us"
      className=" fixed sm:hidden z-50 bottom-14 right-7"
    >
      <div className="relative  w-8 h-8 flex justify-center items-center bg-zinc-200 rounded-full">
        <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-zinc-400 opacity-75"></span>
        <BiSolidPhoneCall className="w-5 h-5 " />
      </div>
    </Link>
  );
};

export default MobileContactFixedBtn;
