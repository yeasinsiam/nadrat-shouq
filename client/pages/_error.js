import Link from "next/link";

function Error({ statusCode }) {
  return (
    <section className="cs-container max-w-6xl mt-10 mb-5 flex flex-col text-center gap-5">
      <p className=" font-bold">
        {statusCode == 404
          ? "Page not found."
          : statusCode
          ? `An error ${statusCode} occurred on server, please try again later.`
          : "An error occurred on client, please try again later."}
      </p>
      <div>
        {statusCode == 404 && (
          <Link
            class="font-semibold px-4 py-2 border-2 border-zinc-600 rounded-lg duration-500 hover:bg-zinc-600 hover:text-white"
            href="/"
          >
            GO TO HOME
          </Link>
        )}
      </div>
    </section>
  );
}

Error.getInitialProps = ({ res, err }) => {
  const statusCode = res ? res.statusCode : err ? err.statusCode : 404;
  return { statusCode };
};

export default Error;
